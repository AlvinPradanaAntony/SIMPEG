package com.ims.helpdesk_mobile.ui.faq

import android.content.Context
import android.content.Intent
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.datastore.core.DataStore
import androidx.datastore.preferences.core.Preferences
import androidx.datastore.preferences.preferencesDataStore
import androidx.lifecycle.ViewModelProvider
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.google.android.material.snackbar.Snackbar
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.ViewModelFactory
import com.ims.helpdesk_mobile.adapter.FaqAdapter
import com.ims.helpdesk_mobile.databinding.ActivityFaqBinding
import com.ims.helpdesk_mobile.db.FAQResponse
import com.ims.helpdesk_mobile.db.data.ListFaqItem
import com.ims.helpdesk_mobile.model.FaqViewModel
import com.ims.helpdesk_mobile.model.UserPreferences
import com.ims.helpdesk_mobile.ui.notifikasi.NotificationActivity
import com.ims.helpdesk_mobile.ui.settings.SettingsActivity

private val Context.dataStore: DataStore<Preferences> by preferencesDataStore(name = "session")
class FaqActivity : AppCompatActivity() {
    private lateinit var faqViewModel: FaqViewModel
    private lateinit var binding: ActivityFaqBinding
    private lateinit var rvFaq: RecyclerView
    private val list = ArrayList<ListFaqItem>()
    private val adapter: FaqAdapter by lazy {
        FaqAdapter(list)
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityFaqBinding.inflate(layoutInflater)
        setContentView(binding.root)
        setupViewModel()
        observeErrorMessage()
        optionMenuSetup()
        customShadow()
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

    private fun setupViewModel() {
        faqViewModel = ViewModelProvider(
            this,
            ViewModelFactory(UserPreferences.getInstance(dataStore))
        )[FaqViewModel::class.java]

        faqViewModel.getUser().observe(this) { user ->
            val name = user.name
            binding.txtUsername.text = name.replaceFirstChar { it.uppercase() }
            Glide.with(this)
                .load("https://ui-avatars.com/api/?name=$name&size=128&background=random")
                .placeholder(R.drawable.ic_placeholder_photo)
                .error(R.drawable.ic_placeholder_photo)
                .into(binding.ivPhoto)
        }
        getFaq()
    }

    private fun getFaq() {
        faqViewModel.getDataFaq()
        faqViewModel.isDataFaq.observe(this) { user ->
            if (user != null) {
                adapter.setListFaq(user.listFaq)
                setRecycleView()
            }
        }
    }

    private fun setRecycleView() {
        val layoutManager = LinearLayoutManager(this)
        binding.rvFaq.layoutManager = layoutManager
        binding.rvFaq.setHasFixedSize(true)
        binding.rvFaq.adapter = adapter
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
    private fun observeErrorMessage() {
        faqViewModel.isError.observe(this) {
            showSnackBar(it)
        }
    }
    private fun showSnackBar(value: String) {
        Snackbar.make(binding.root, value, Snackbar.LENGTH_SHORT).show()
    }
}

