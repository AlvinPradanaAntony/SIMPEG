package com.ims.helpdesk_mobile.ui.login

import android.content.Context
import android.content.Intent
import android.content.res.Configuration
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import android.view.inputmethod.InputMethodManager
import androidx.appcompat.app.AlertDialog
import androidx.datastore.core.DataStore
import androidx.datastore.preferences.core.Preferences
import androidx.datastore.preferences.preferencesDataStore
import androidx.lifecycle.ViewModelProvider
import com.google.android.material.snackbar.Snackbar
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.ViewModelFactory
import com.ims.helpdesk_mobile.databinding.ActivityLoginBinding
import com.ims.helpdesk_mobile.model.LoginViewModel
import com.ims.helpdesk_mobile.model.UserModel
import com.ims.helpdesk_mobile.model.UserPreferences
import com.ims.helpdesk_mobile.ui.home.MainActivity

private val Context.dataStore: DataStore<Preferences> by preferencesDataStore(name = "session")
class LoginActivity : AppCompatActivity() {
    private lateinit var binding : ActivityLoginBinding
    private lateinit var loginViewModel: LoginViewModel
    private lateinit var user: UserModel
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setupViewModel()
        observeLoading()
        observeErrorMesage()
        setupAction()
        changeBgAbstract()
    }
    private fun changeBgAbstract(){
        val imageView = binding.bgAbstract1
        val display = windowManager.defaultDisplay
        val orientation = if (display.width < display.height) {
            Configuration.ORIENTATION_PORTRAIT
        } else {
            Configuration.ORIENTATION_LANDSCAPE
        }

        val drawableId = if (orientation == Configuration.ORIENTATION_PORTRAIT) {
            R.drawable.asset_10
        } else {
            R.drawable.asset_9
        }

        imageView.setImageResource(drawableId)
    }

    private fun setupViewModel() {
        loginViewModel = ViewModelProvider(
            this,
            ViewModelFactory(UserPreferences.getInstance(dataStore))
        )[LoginViewModel::class.java]
        loginViewModel.getUser().observe(this) { user ->
            this.user = user
            Log.d("CekTokenLogin", "Token: ${user.token}")
            Log.d("CekNip", "Nip: ${user.nip}")
            Log.d("CekPosition", "Position: ${user.position}")
            Log.d("CekNameLogin", "Name: ${user.name}")
        }
    }

    private fun setupAction() {
        binding.buttonLogin.setOnClickListener {
            val nip = binding.edLoginNip.text?.trim().toString()
            val password = binding.edLoginPassword.text?.trim().toString()

            if (nip.isEmpty() && password.isEmpty()) {
                AlertDialog.Builder(this).apply {
                    setTitle("Oops!")
                    setMessage("Email dan password tidak boleh kosong")
                    setPositiveButton("OK") { _, _ -> }
                    create()
                    show()
                }
            } else {
                if (nip.isEmpty()) {
                    binding.edLoginNip.error = "Masukan NIP Anda"
                    binding.edLoginNip.requestFocus()
                } else if (password.isEmpty()) {
                    binding.edLoginPassword.error = "Masukan Password Anda"
                    binding.edLoginPassword.requestFocus()
                }  else if (password.length < 6) {
                    binding.edLoginPassword.error = resources.getString(R.string.password_minimum_character)
                    binding.edLoginPassword.requestFocus()
                } else {
                    binding.edLoginNip.clearFocus()
                    binding.edLoginPassword.clearFocus()
                    hideKeyboard()
                    login(nip, password)
                }
            }
        }
    }

    private fun login(nip: String, password: String) {
        loginViewModel.login(nip, password)
        loginViewModel.loginUser.observe(this) { user ->
            val name = user.loginResult?.name.toString()
            val nip = user.loginResult?.nip.toString()
            val position = user.loginResult?.positionId.toString()
            if (position == null){
                position == "Belum ada jabatan"
            }
            val photoUrl = user.loginResult?.profilePhotoUrl.toString()
            val token = user.token.toString()
            loginViewModel.saveUser(UserModel(name, nip, position, photoUrl,token, true))
            val intent = Intent(this, MainActivity::class.java)
            intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
            startActivity(intent)
            finish()
        }
    }

    private fun hideKeyboard() {
        val inputMethodManager = getSystemService(Context.INPUT_METHOD_SERVICE) as InputMethodManager
        inputMethodManager.hideSoftInputFromWindow(binding.root.windowToken, 0)
    }

    private fun observeLoading() {
        loginViewModel.isLoading.observe(this) {
            showLoading(it)
        }
    }

    private fun observeErrorMesage() {
        loginViewModel.isError.observe(this) {
            showSnackBar(it)
        }
    }

    private fun showSnackBar(value: String) {
        Snackbar.make(
            binding.buttonLogin, value, Snackbar.LENGTH_SHORT
        ).show()
    }

    private fun showLoading(isLoading: Boolean) {
        binding.progressBar.visibility = if (isLoading) View.VISIBLE else View.GONE
        binding.overlayBg.visibility = if (isLoading) View.VISIBLE else View.GONE
    }
}