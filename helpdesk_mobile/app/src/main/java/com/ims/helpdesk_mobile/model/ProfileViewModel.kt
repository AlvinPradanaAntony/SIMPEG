package com.ims.helpdesk_mobile.model

import android.util.Log
import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.asLiveData
import androidx.lifecycle.viewModelScope
import com.ims.helpdesk_mobile.db.ApiConfig
import com.ims.helpdesk_mobile.db.data.HelpdeskAPIResponse
import com.ims.helpdesk_mobile.db.data.LoginResponse
import com.ims.helpdesk_mobile.db.data.UserAPIResponse
import kotlinx.coroutines.launch
import org.json.JSONObject
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ProfileViewModel(private val pref: UserPreferences) : ViewModel() {
    private val _isDataUser = MutableLiveData<UserAPIResponse>()
    val isDataUser: LiveData<UserAPIResponse> = _isDataUser

    private val _isLoading = MutableLiveData<Boolean>()
    val isLoading: LiveData<Boolean> = _isLoading

    private val _isError = MutableLiveData<String>()
    val isError: LiveData<String> = _isError

    fun getDataUser(token: String) {
        _isLoading.value = true
        val client = ApiConfig.getApiService().getDataUser("application/json", "Bearer $token")
        client.enqueue(object : Callback<UserAPIResponse> {
            override fun onResponse(
                call: Call<UserAPIResponse>,
                response: Response<UserAPIResponse>
            ) {
                if (response.isSuccessful) {
                    _isLoading.value = false
                    val responseBody = response.body()
                    if (responseBody != null && !responseBody.error) {
                        _isDataUser.postValue(response.body())
                    }
                } else {
                    _isLoading.value = false
                    val responseError = response.errorBody()?.string()
                    val objErr = JSONObject(responseError.toString())
                    _isError.value = objErr.getString("message")?: response.message()
                    Log.d("UserOnResponse", "onResponse: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<UserAPIResponse>, t: Throwable) {
                _isLoading.value = false
                _isError.value = t.message
                Log.d("UserOnFailure", "onFailure: ${t.message.toString()}")
            }
        })
    }

    fun getUser(): LiveData<UserModel> {
        return pref.getUser().asLiveData()
    }

    fun saveUser(user: UserModel) {
        viewModelScope.launch {
            pref.saveUser(user)
        }
    }
}