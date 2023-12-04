package com.ims.helpdesk_mobile

import androidx.lifecycle.ViewModel
import androidx.lifecycle.ViewModelProvider
import com.ims.helpdesk_mobile.model.UserPreferences

//import androidx.lifecycle.ViewModelProvider
//import com.devcode.storyapp.model.UserPreferences
//import com.devcode.storyapp.ui.addStory.AddStoryViewModel
//import com.devcode.storyapp.ui.home.MainViewModel
//import com.devcode.storyapp.ui.login.LoginViewModel
//import com.devcode.storyapp.ui.profile.ProfileViewModel
//import com.devcode.storyapp.ui.register.RegisterViewModel


class ViewModelFactory(private val pref: UserPreferences) : ViewModelProvider.NewInstanceFactory() {

    @Suppress("UNCHECKED_CAST")
    override fun <T : ViewModel> create(modelClass: Class<T>): T {
        return when {
//            modelClass.isAssignableFrom(MainViewModel::class.java) -> {
            else -> throw IllegalArgumentException("Unknown ViewModel class: " + modelClass.name)
        }
    }
}