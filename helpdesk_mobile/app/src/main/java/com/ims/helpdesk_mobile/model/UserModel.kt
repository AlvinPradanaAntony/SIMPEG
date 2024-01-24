package com.ims.helpdesk_mobile.model

data class UserModel(
    val name: String,
    val nip: String,
    val position: String? = null,
    val photoUrl: String,
    val token: String,
    val isLogin: Boolean
)
