package com.ims.helpdesk_mobile.ui.home

import android.content.Intent
import android.content.res.Configuration
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.databinding.ActivityMainBinding
import com.ims.helpdesk_mobile.ui.faq.FaqActivity
import com.ims.helpdesk_mobile.ui.webview.*

class MainActivity : AppCompatActivity() {
    private lateinit var binding : ActivityMainBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)
        changeBgAbstract()
        setupAction()
    }
    private fun setupAction(){
        binding.apply {
            menuSimpegDashboard.setOnClickListener {
                startActivity(Intent(this@MainActivity, SimpegDashboardActivity::class.java))
            }
            menuSimpegSapk.setOnClickListener {
                startActivity(Intent(this@MainActivity, SimpegSapkActivity::class.java))
            }
            menuSimpegEkinerja.setOnClickListener {
                startActivity(Intent(this@MainActivity, EkinerjaActivity::class.java))
            }
            menuSimpegDms.setOnClickListener {
                startActivity(Intent(this@MainActivity, DmsActivity::class.java))
            }
            menuSimpegJabatan.setOnClickListener {
                startActivity(Intent(this@MainActivity, ManagementPositionActivity::class.java))
            }
            menuSimpegFaq.setOnClickListener {
                startActivity(Intent(this@MainActivity, FaqActivity::class.java))
            }
        }
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
}