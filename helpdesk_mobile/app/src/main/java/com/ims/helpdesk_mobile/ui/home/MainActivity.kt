package com.ims.helpdesk_mobile.ui.home

import android.content.Intent
import android.content.res.Configuration
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.databinding.ActivityMainBinding
import com.ims.helpdesk_mobile.ui.faq.FaqActivity
import com.ims.helpdesk_mobile.ui.notifikasi.NotificationActivity
import com.ims.helpdesk_mobile.ui.settings.SettingsActivity
import com.ims.helpdesk_mobile.ui.webview.*

class MainActivity : AppCompatActivity() {
    private lateinit var binding : ActivityMainBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)
        changeBgAbstract()
        setupAction()
        optionMenuSetup()
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
            R.drawable.asset_6
        } else {
            R.drawable.asset_9
        }

        imageView.setImageResource(drawableId)
    }
    private fun optionMenuSetup(){
        val menu = binding.topAppBar
        menu.setOnMenuItemClickListener { menuItem ->
            when(menuItem.itemId){
                R.id.notifikasi ->{
                    val intent = Intent(this, NotificationActivity::class.java)
                    startActivity(intent)
                    true
                }
                R.id.setting ->{
                    val intent = Intent(this, SettingsActivity::class.java)
                    startActivity(intent)
                    true
                }
                else ->{
                    false
                }
            }
        }
    }
}