package com.ims.helpdesk_mobile.ui.settings

import android.content.Intent
import android.content.res.Configuration
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import com.google.android.material.appbar.MaterialToolbar
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.databinding.ActivitySettingsBinding
import com.ims.helpdesk_mobile.ui.profile.ProfileActivity

class SettingsActivity : AppCompatActivity() {
    private lateinit var binding: ActivitySettingsBinding
    private lateinit var toolbar: MaterialToolbar
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySettingsBinding.inflate(layoutInflater)
        setContentView(binding.root)
        changeBgAbstract()
        setupView()
        setupAction()
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
            menuUbahSandi.setOnClickListener {
                val alertDialog = AlertDialog.Builder(this@SettingsActivity)
                val dialog = alertDialog.create()

                val dialogView = layoutInflater.inflate(R.layout.item_layout_changepw_dialog, null, false)
                dialog.window?.setBackgroundDrawableResource(android.R.color.transparent)
                dialog.setView(dialogView)
                dialogView.findViewById<View>(R.id.btn_close).setOnClickListener {
                    dialog.dismiss()
                }
                dialog.show()
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
                Toast.makeText(this@SettingsActivity, "Keluar", Toast.LENGTH_SHORT).show()
            }
        }
    }

    override fun onSupportNavigateUp(): Boolean {
        finish()
        return true
    }
}