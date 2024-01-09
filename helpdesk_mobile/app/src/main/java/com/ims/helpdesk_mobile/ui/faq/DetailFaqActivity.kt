package com.ims.helpdesk_mobile.ui.faq

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.databinding.ActivityDetailFaqBinding
import com.ims.helpdesk_mobile.db.FAQResponse

class DetailFaqActivity : AppCompatActivity() {
    private lateinit var binding: ActivityDetailFaqBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityDetailFaqBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val data = intent.getParcelableExtra<FAQResponse>("DATA_FAQ")
        binding.tvTitleDetailFaq.text = data?.question
    }
}