package com.ims.helpdesk_mobile.ui.home

import android.util.Log
import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.asLiveData
import com.ims.helpdesk_mobile.db.ApiConfig
import com.ims.helpdesk_mobile.db.TicketAPIResponse
import com.ims.helpdesk_mobile.model.UserModel
import com.ims.helpdesk_mobile.model.UserPreferences
import org.json.JSONObject
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainViewModel(private val pref: UserPreferences) : ViewModel() {
    private val _isStory = MutableLiveData<TicketAPIResponse>()
    val isStory: LiveData<TicketAPIResponse> = _isStory

    private val _isLoading = MutableLiveData<Boolean>()
    val isLoading: LiveData<Boolean> = _isLoading

    private val _isError = MutableLiveData<String>()
    val isError: LiveData<String> = _isError

    fun postStory(token: String) {
        _isLoading.value = true
        val client = ApiConfig.getApiService().getStories("Bearer $token")
        client.enqueue(object : Callback<TicketAPIResponse> {
            override fun onResponse(
                call: Call<TicketAPIResponse>,
                response: Response<TicketAPIResponse>
            ) {
                if (response.isSuccessful) {
                    _isLoading.value = false
                    val responseBody = response.body()
                    if (responseBody != null && !responseBody.error) {
                        _isStory.postValue(response.body())
                    }
                } else {
                    _isLoading.value = false
                    val responseError = response.errorBody()?.string()
                    val objErr = JSONObject(responseError.toString())
                    _isError.value = objErr.getString("message")?: response.message()
                    Log.d("PostLoginOnResponse", "onResponse: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<TicketAPIResponse>, t: Throwable) {
                _isLoading.value = false
                _isError.value = t.message
                Log.d("PostLoginOnFailure", "onFailure: ${t.message.toString()}")
            }
        })
    }

    fun getUser(): LiveData<UserModel> {
        return pref.getUser().asLiveData()
    }

}