package com.ims.helpdesk_mobile.ui.faq

import android.content.Intent
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.Menu
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.adapter.ListFAQAdapter
import com.ims.helpdesk_mobile.databinding.ActivityFaqBinding
import com.ims.helpdesk_mobile.db.FAQResponse
import com.ims.helpdesk_mobile.ui.notifikasi.NotificationActivity
import com.ims.helpdesk_mobile.ui.settings.SettingsActivity

class FaqActivity : AppCompatActivity() {
    private lateinit var binding: ActivityFaqBinding
    private lateinit var rvFaq: RecyclerView
    private val list = ArrayList<FAQResponse>()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityFaqBinding.inflate(layoutInflater)
        setContentView(binding.root)
        optionMenuSetup()
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
            binding.appbarLayoutId.outlineAmbientShadowColor = getColor(android.R.color.transparent)
            binding.appbarLayoutId.outlineSpotShadowColor = getColor(android.R.color.transparent)
        } else {
            binding.containerSearch.elevation = 6f
            binding.search.elevation = 0f
            binding.appbarLayoutId.elevation = 0.5f
        }
    }
    private fun getListFAQ(): ArrayList<FAQResponse> {
        val dataQuestion = resources.getStringArray(R.array.data_questions)
        val dataAnswer = resources.getStringArray(R.array.data_description)
        val listFaq = ArrayList<FAQResponse>()
        for (position in dataQuestion.indices) {
            val faq = FAQResponse(
                dataQuestion[position],
                dataAnswer[position]
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
//        listFaqAdapter.setOnItemClickCallback(object : ListFAQAdapter.OnItemClickCallback {
//            override fun onItemClicked(data: FAQResponse) {
//                val intent = Intent(this@FaqActivity, DetailFaqActivity::class.java)
//                intent.putExtra("DATA_FAQ", data)
//                startActivity(intent)
//            }
//        })
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