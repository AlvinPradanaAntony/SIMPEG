package com.ims.helpdesk_mobile.ui.settings

import android.content.res.Configuration
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.google.android.material.appbar.MaterialToolbar
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.databinding.ActivitySettingsBinding

class SettingsActivity : AppCompatActivity() {
    private lateinit var binding: ActivitySettingsBinding
    private lateinit var toolbar: MaterialToolbar
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySettingsBinding.inflate(layoutInflater)
        setContentView(binding.root)
        changeBgAbstract()
        setupView()
    }
    private fun setupView(){
        toolbar = binding.topAppBar
        setSupportActionBar(toolbar)
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        supportActionBar?.setDisplayShowTitleEnabled(true)
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
            R.drawable.asset_7
        } else {
            R.drawable.asset_10
        }

        imageView.setImageResource(drawableId)
    }
    override fun onSupportNavigateUp(): Boolean {
        finish()
        return true
    }
}