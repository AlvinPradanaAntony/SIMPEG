package com.ims.helpdesk_mobile.ui.faq

import android.content.Intent
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.adapter.ListFAQAdapter
import com.ims.helpdesk_mobile.databinding.ActivityFaqBinding
import com.ims.helpdesk_mobile.db.FAQResponse

class FaqActivity : AppCompatActivity() {
    private lateinit var binding: ActivityFaqBinding
    private lateinit var rvFaq: RecyclerView
    private val list = ArrayList<FAQResponse>()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityFaqBinding.inflate(layoutInflater)
        setContentView(binding.root)
        customShadow()
        rvFaq = binding.rvFaq
        list.addAll(getListFAQ())
        showRecyclerList()
    }
    private fun customShadow() {
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.P) {
            binding.containerSearch.outlineAmbientShadowColor = getColor(R.color.shadowAmbientColor)
            binding.containerSearch.outlineSpotShadowColor = getColor(R.color.shadowSpotColor)
            binding.search.outlineAmbientShadowColor = getColor(R.color.shadowSpotColor)
            binding.search.outlineSpotShadowColor = getColor(R.color.shadowSpotColor)
        } else {
            binding.containerSearch.elevation = 6f
            binding.search.elevation = 0f
        }
    }
    private fun getListFAQ(): ArrayList<FAQResponse> {
        val dataQuestion = resources.getStringArray(R.array.data_questions)
        val listFaq = ArrayList<FAQResponse>()
        for (position in dataQuestion.indices) {
            val faq = FAQResponse(
                dataQuestion[position],
            )
            listFaq.add(faq)
        }
        return listFaq
    }
    private fun showRecyclerList() {
        rvFaq.setHasFixedSize(true)
        rvFaq.isNestedScrollingEnabled = false
        rvFaq.layoutManager = LinearLayoutManager(this)
        val listFaqAdapter = ListFAQAdapter(list)
        rvFaq.adapter = listFaqAdapter
        listFaqAdapter.setOnItemClickCallback(object : ListFAQAdapter.OnItemClickCallback {
            override fun onItemClicked(data: FAQResponse) {
                val intent = Intent(this@FaqActivity, DetailFaqActivity::class.java)
                intent.putExtra("DATA_FAQ", data)
                startActivity(intent)
            }
        })
    }
}