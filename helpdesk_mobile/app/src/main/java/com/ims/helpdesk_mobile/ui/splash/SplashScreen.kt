package com.ims.helpdesk_mobile.ui.splash

import android.annotation.SuppressLint
import android.content.Context
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.os.Looper
import androidx.datastore.core.DataStore
import androidx.datastore.preferences.core.Preferences
import androidx.datastore.preferences.preferencesDataStore
import androidx.lifecycle.ViewModelProvider
import com.ims.helpdesk_mobile.ViewModelFactory
import com.ims.helpdesk_mobile.databinding.ActivitySplashScreenBinding
import com.ims.helpdesk_mobile.model.MainViewModel
import com.ims.helpdesk_mobile.model.UserPreferences
import com.ims.helpdesk_mobile.ui.home.MainActivity
import com.ims.helpdesk_mobile.ui.login.LoginActivity

private val Context.dataStore: DataStore<Preferences> by preferencesDataStore(name = "session")
@SuppressLint("CustomSplashScreen")
class SplashScreen : AppCompatActivity() {
    private lateinit var binding: ActivitySplashScreenBinding
    private lateinit var mainViewModel: MainViewModel
    private  var isLogin: Boolean = true

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySplashScreenBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setupViewModel()
        Handler(Looper.getMainLooper()).postDelayed({
            if (isLogin){
                startActivity(Intent(this, MainActivity::class.java))
            } else{
                startActivity(Intent(this, LoginActivity::class.java))
            }
            overridePendingTransition(android.R.anim.fade_in, android.R.anim.fade_out)
            finish()
        }, delaySplashScreen)

    }
    private fun setupViewModel() {
        mainViewModel = ViewModelProvider(
            this,
            ViewModelFactory(UserPreferences.getInstance(dataStore))
        )[MainViewModel::class.java]

        mainViewModel.getUser().observe(this) { user ->
            if (!user.isLogin) {
                isLogin = false
            }
        }
    }

    companion object{
        const val delaySplashScreen = 3000L
    }
}