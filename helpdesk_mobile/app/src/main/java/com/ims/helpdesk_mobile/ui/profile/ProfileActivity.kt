package com.ims.helpdesk_mobile.ui.profile

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.databinding.ActivityProfileBinding

class ProfileActivity : AppCompatActivity() {
    private lateinit var binding : ActivityProfileBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityProfileBinding.inflate(layoutInflater)
        setContentView(binding.root)
    }
}