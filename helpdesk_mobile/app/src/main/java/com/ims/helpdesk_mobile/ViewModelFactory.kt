package com.ims.helpdesk_mobile

import androidx.lifecycle.ViewModel
import androidx.lifecycle.ViewModelProvider
import com.ims.helpdesk_mobile.model.FaqViewModel
import com.ims.helpdesk_mobile.model.LoginViewModel
import com.ims.helpdesk_mobile.model.MainViewModel
import com.ims.helpdesk_mobile.model.ProfileViewModel
import com.ims.helpdesk_mobile.model.SettingsViewModel
import com.ims.helpdesk_mobile.model.UserPreferences


class ViewModelFactory(private val pref: UserPreferences) : ViewModelProvider.NewInstanceFactory() {

    @Suppress("UNCHECKED_CAST")
    override fun <T : ViewModel> create(modelClass: Class<T>): T {
        return when {
            modelClass.isAssignableFrom(MainViewModel::class.java) -> {
                MainViewModel(pref) as T
            }
            modelClass.isAssignableFrom(FaqViewModel::class.java) -> {
                FaqViewModel(pref) as T
            }
            modelClass.isAssignableFrom(LoginViewModel::class.java) -> {
                LoginViewModel(pref) as T
            }
            modelClass.isAssignableFrom(SettingsViewModel::class.java) -> {
                SettingsViewModel(pref) as T
            }
            modelClass.isAssignableFrom(ProfileViewModel::class.java) -> {
                ProfileViewModel(pref) as T
            }
            else -> throw IllegalArgumentException("Unknown ViewModel class: " + modelClass.name)
        }
    }
}