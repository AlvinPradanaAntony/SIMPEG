package com.ims.helpdesk_mobile.ui.profile

import android.content.Context
import android.content.Intent
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import androidx.datastore.core.DataStore
import androidx.datastore.preferences.core.Preferences
import androidx.datastore.preferences.preferencesDataStore
import androidx.lifecycle.ViewModelProvider
import com.bumptech.glide.Glide
import com.google.android.material.appbar.MaterialToolbar
import com.ims.helpdesk_mobile.R
import com.ims.helpdesk_mobile.ViewModelFactory
import com.ims.helpdesk_mobile.databinding.ActivityProfileBinding
import com.ims.helpdesk_mobile.model.FaqViewModel
import com.ims.helpdesk_mobile.model.ProfileViewModel
import com.ims.helpdesk_mobile.model.UserModel
import com.ims.helpdesk_mobile.model.UserPreferences
import com.ims.helpdesk_mobile.ui.home.MainActivity
import java.time.LocalDate
import java.time.format.DateTimeFormatter

private val Context.dataStore: DataStore<Preferences> by preferencesDataStore(name = "session")
class ProfileActivity : AppCompatActivity() {
    private lateinit var binding : ActivityProfileBinding
    private lateinit var toolbar: MaterialToolbar
    private lateinit var profileViewModel: ProfileViewModel
    private lateinit var userToken: String

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityProfileBinding.inflate(layoutInflater)
        setContentView(binding.root)
        setupViewModel()
        setupView()
        setupAction()
    }

    private fun setupViewModel() {
        profileViewModel = ViewModelProvider(
            this,
            ViewModelFactory(UserPreferences.getInstance(dataStore))
        )[ProfileViewModel::class.java]
        profileViewModel.getUser().observe(this) { user ->
            userToken = user.token
            getUser(userToken)
        }

    }

    private fun getUser(token: String) {
        profileViewModel.getDataUser(token)
        profileViewModel.isDataUser.observe(this) {
            if (it != null) {
               if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
                   val formatter = DateTimeFormatter.ofPattern("dd-MM-yyyy")
                   val date = LocalDate.parse(it.user?.birthDate)
                   val formattedDate = date.format(formatter)
                   binding.textBirthOfdate.text = formattedDate.toString()?: resources.getString(R.string.kosong)
                } else {
                   binding.textBirthOfdate.text = it.user?.birthDate?: resources.getString(R.string.kosong)
               }
                val user = it.user
                Glide.with(this)
                    .load("${it.user?.profilePhotoUrl}&size=128")
                    .placeholder(R.drawable.ic_placeholder_photo)
                    .error(R.drawable.ic_placeholder_photo)
                    .into(binding.ivAvatar)
                setTextViewText(binding.textNama, user?.name)
                setTextViewText(binding.textGender, user?.gender)
                setTextViewText(binding.textBirthOfPlace, user?.birthPlace)
                setTextViewText(binding.textReligion, user?.religion)
                setTextViewText(binding.textStatus, user?.maritalStatus)
                setTextViewText(binding.textPhone, user?.phone)
                setTextViewText(binding.textAddress, user?.address)
                setTextViewText(binding.textEmail, user?.email)
                setTextViewText(binding.textDepartemen, user?.departments?.department)
                setTextViewText(binding.textJabatan, user?.positions?.position)
            }
        }
    }
    private fun setTextViewText(textView: TextView, value: String?) {
        textView.text = value ?: resources.getString(R.string.kosong)
    }

    override fun onResume() {
        super.onResume()
        getUser(userToken)
    }

    private fun setupView() {
        toolbar = binding.topAppBar
        setSupportActionBar(toolbar)
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        supportActionBar?.setDisplayShowTitleEnabled(true)
    }
    private fun setupAction(){
        binding.buttonEdit.setOnClickListener {
//            startActivity(Intent(this@ProfileActivity, EditProfileActivity::class.java))
//            profileViewModel.isDataUser.observe(this) {
//                val name = it.user?.name.toString()
//                val position =it.user?.positions?.position
//                val nip = it.user?.nip.toString()
//                val photoUrl = it.user?.profilePhotoUrl.toString()
//                val token = userToken
//                if (position == null){
//                    position == "Belum ada jabatan"
//                }
//                profileViewModel.saveUser(UserModel(name, nip, position, photoUrl,token, true))
//            }
        }
    }

    override fun onSupportNavigateUp(): Boolean {
        finish()
        return true
    }
}