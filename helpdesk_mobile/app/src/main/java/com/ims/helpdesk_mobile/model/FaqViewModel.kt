package com.ims.helpdesk_mobile.model

import android.util.Log
import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.asLiveData
import com.ims.helpdesk_mobile.db.ApiConfig
import com.ims.helpdesk_mobile.db.data.HelpdeskAPIResponse
import org.json.JSONObject
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class FaqViewModel(private val pref: UserPreferences) : ViewModel() {
    private val _isDataFaq = MutableLiveData<HelpdeskAPIResponse>()
    val isDataFaq: LiveData<HelpdeskAPIResponse> = _isDataFaq

    private val _isLoading = MutableLiveData<Boolean>()
    val isLoading: LiveData<Boolean> = _isLoading

    private val _isError = MutableLiveData<String>()
    val isError: LiveData<String> = _isError

    fun getDataFaq() {
        _isLoading.value = true
        val client = ApiConfig.getApiService().getDataFaq("application/json")
        client.enqueue(object : Callback<HelpdeskAPIResponse> {
            override fun onResponse(
                call: Call<HelpdeskAPIResponse>,
                response: Response<HelpdeskAPIResponse>
            ) {
                if (response.isSuccessful) {
                    _isLoading.value = false
                    val responseBody = response.body()
                    if (responseBody != null && !responseBody.error) {
                        _isDataFaq.postValue(response.body())
                    }
                } else {
                    _isLoading.value = false
                    val responseError = response.errorBody()?.string()
                    val objErr = JSONObject(responseError.toString())
                    _isError.value = objErr.getString("message")?: response.message()
                    Log.d("FaqOnResponse", "onResponse: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<HelpdeskAPIResponse>, t: Throwable) {
                _isLoading.value = false
                _isError.value = t.message
                Log.d("FaqOnFailure", "onFailure: ${t.message.toString()}")
            }
        })
    }

    fun getUser(): LiveData<UserModel> {
        return pref.getUser().asLiveData()
    }

}