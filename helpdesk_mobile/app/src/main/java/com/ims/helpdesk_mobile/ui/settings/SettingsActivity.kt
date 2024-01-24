package com.ims.helpdesk_mobile.ui.settings

import android.content.Context
import android.content.Intent
import android.content.res.Configuration
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import androidx.datastore.core.DataStore
import androidx.datastore.preferences.core.Preferences
import androidx.datastore.preferences.preferencesDataStore
import androidx.lifecycle.ViewModelProvider
import com.bumptech.glide.Glide
import com.google.android.material.appbar.MaterialToolbar
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.ViewModelFactory
import com.ims.helpdesk_mobile.databinding.ActivitySettingsBinding
import com.ims.helpdesk_mobile.model.SettingsViewModel
import com.ims.helpdesk_mobile.model.UserPreferences
import com.ims.helpdesk_mobile.ui.login.LoginActivity
import com.ims.helpdesk_mobile.ui.profile.ProfileActivity

private val Context.dataStore: DataStore<Preferences> by preferencesDataStore(name = "session")
class SettingsActivity : AppCompatActivity() {
    private lateinit var binding: ActivitySettingsBinding
    private lateinit var toolbar: MaterialToolbar
    private lateinit var settingsViewModel: SettingsViewModel
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySettingsBinding.inflate(layoutInflater)
        setContentView(binding.root)
        changeBgAbstract()
        setupViewModel()
        setupView()
        setupAction()
    }

    private fun setupViewModel() {
        settingsViewModel = ViewModelProvider(
            this,
            ViewModelFactory(UserPreferences.getInstance(dataStore))
        )[SettingsViewModel::class.java]

        settingsViewModel.getUser().observe(this) { user ->
            val name = user.name
            val url = user.photoUrl
            binding.usernameAccount.text = name.replaceFirstChar { it.uppercase() }
            Glide.with(this)
                .load("${url}&size=128")
                .placeholder(R.drawable.ic_placeholder_photo)
                .error(R.drawable.ic_placeholder_photo)
                .into(binding.ivAvatar)
        }
    }

    private fun setupView() {
        toolbar = binding.topAppBar
        setSupportActionBar(toolbar)
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        supportActionBar?.setDisplayShowTitleEnabled(true)
    }

    private fun changeBgAbstract() {
        val imageView = binding.bgAbstract1
        val display = windowManager.defaultDisplay
        val orientation = if (display.width < display.height) {
            Configuration.ORIENTATION_PORTRAIT
        } else {
            Configuration.ORIENTATION_LANDSCAPE
        }

        val drawableId = if (orientation == Configuration.ORIENTATION_PORTRAIT) {
            R.drawable.asset_6
        } else {
            R.drawable.asset_9
        }

        imageView.setImageResource(drawableId)
    }

    private fun setupAction() {
        binding.apply {
            menuInformasiPersonal.setOnClickListener {
                startActivity(Intent(this@SettingsActivity, ProfileActivity::class.java))
            }
            menuMyticket.setOnClickListener {
                Toast.makeText(this@SettingsActivity, "Tiket Saya", Toast.LENGTH_SHORT).show()
            }
            menuPusatBantuan.setOnClickListener {
                val alertDialog = AlertDialog.Builder(this@SettingsActivity)
                val dialog = alertDialog.create()

                val dialogView = layoutInflater.inflate(R.layout.item_layout_bantuan_dialog, null, false)
                dialog.window?.setBackgroundDrawableResource(android.R.color.transparent)
                dialog.setView(dialogView)
                dialogView.findViewById<View>(R.id.btn_close).setOnClickListener {
                    dialog.dismiss()
                }
                dialog.show()
            }
            menuTentangAplikasi.setOnClickListener {
                val alertDialog = AlertDialog.Builder(this@SettingsActivity)
                val dialog = alertDialog.create()

                val dialogView = layoutInflater.inflate(R.layout.item_layout_info_dialog, null, false)
                dialog.window?.setBackgroundDrawableResource(android.R.color.transparent)
                dialog.setView(dialogView)
                dialogView.findViewById<View>(R.id.btn_close).setOnClickListener {
                    dialog.dismiss()
                }
                dialog.show()
            }
            menuKeluar.setOnClickListener {
                val alertDialog = AlertDialog.Builder(this@SettingsActivity)
                val dialog = alertDialog.create()

                val dialogView = layoutInflater.inflate(R.layout.item_layout_logout_dialog, null, false)
                dialog.window?.setBackgroundDrawableResource(android.R.color.transparent)
                dialog.setView(dialogView)
                dialogView.findViewById<View>(R.id.btn_close).setOnClickListener {
                    dialog.dismiss()
                }
                dialogView.findViewById<View>(R.id.btn_cancel).setOnClickListener {
                    dialog.dismiss()
                }
                dialogView.findViewById<View>(R.id.btn_logout).setOnClickListener {
                    startActivity(Intent(this@SettingsActivity, LoginActivity::class.java))
                    finishAffinity()
                    settingsViewModel.logout()
                }
                dialog.show()
            }
        }
    }

    override fun onSupportNavigateUp(): Boolean {
        finish()
        return true
    }
}