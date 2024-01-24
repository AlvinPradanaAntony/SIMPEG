package com.ims.helpdesk_mobile.db

import com.ims.helpdesk_mobile.db.data.HelpdeskAPIResponse
import com.ims.helpdesk_mobile.db.data.LoginResponse
import com.ims.helpdesk_mobile.db.data.RegisterResponse
import com.ims.helpdesk_mobile.db.data.UserAPIResponse
import okhttp3.MultipartBody
import okhttp3.RequestBody
import retrofit2.Call
import retrofit2.http.*

interface ApiService {
    @FormUrlEncoded
    @POST("register")
    fun register(
        @Field("nip") nip: String,
        @Field("name") name: String,
        @Field("email") email: String,
        @Field("password") password: String
    ) : Call<RegisterResponse>

    @FormUrlEncoded
    @POST("login")
    fun login(
        @Field("nip") nip: String,
        @Field("password") password: String
    ) : Call<LoginResponse>

    @GET("faq")
    fun getDataFaq(
        @Header("Accept") accept: String,
    ) : Call<HelpdeskAPIResponse>

    @GET("profile")
    fun getDataUser(
        @Header("Accept") accept: String,
        @Header("Authorization") token: String
    ) : Call<UserAPIResponse>

}