package com.ims.helpdesk_mobile.ui.faq

import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.databinding.ActivityFaqBinding

class FaqActivity : AppCompatActivity() {
    private lateinit var binding: ActivityFaqBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityFaqBinding.inflate(layoutInflater)
        setContentView(binding.root)
        customShadow()
    }
    private fun customShadow() {
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.P) {
            binding.view.outlineAmbientShadowColor = getColor(R.color.shadowAmbientColor)
            binding.view.outlineSpotShadowColor = getColor(R.color.shadowSpotColor)
        } else {
            binding.view.elevation = 6f
        }
    }
}