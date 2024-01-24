package com.ims.helpdesk_mobile.db.data

import android.os.Parcelable
import com.google.gson.annotations.SerializedName
import kotlinx.parcelize.Parcelize

data class HelpdeskAPIResponse(

    @field:SerializedName("listFaq")
    val listFaq: ArrayList<ListFaqItem>,

    @field:SerializedName("error")
    val error: Boolean,

    @field:SerializedName("message")
    val message: String
)

@Parcelize
data class ListFaqItem(

    @field:SerializedName("question")
    val question: String,

    @field:SerializedName("answer")
    val answer: String,

    @field:SerializedName("id")
    val id: Int
) : Parcelable

data class RegisterResponse(
    @field:SerializedName("error")
    val error: Boolean,

    @field:SerializedName("message")
    val message: String
)

data class LoginResponse(
    @field:SerializedName("error")
    val error: Boolean,

    @field:SerializedName("message")
    val message: String,

    @field:SerializedName("access_token")
    val token: String,

    @field:SerializedName("user")
    val loginResult: LoginResult?
)

data class LoginResult(
    @field:SerializedName("id")
    val id: Int,

    @field:SerializedName("nip")
    val nip: String,

    @field:SerializedName("name")
    val name: String,

    @field:SerializedName("gender")
    val gender: String? = null,

    @field:SerializedName("birth_place")
    val birthPlace: String? = null,

    @field:SerializedName("birth_date")
    val birthDate: String? = null,

    @field:SerializedName("religion")
    val religion: String? = null,

    @field:SerializedName("marital_status")
    val maritalStatus: String? = null,

    @field:SerializedName("department_id")
    val departmentId: Int? = null,

    @field:SerializedName("position_id")
    val positionId: Int? = null,

    @field:SerializedName("role_id")
    val roleId: Int,

    @field:SerializedName("address")
    val address: String? = null,

    @field:SerializedName("phone")
    val phone: String? = null,

    @field:SerializedName("email")
    val email: String? = null,

    @field:SerializedName("two_factor_confirmed_at")
    val twoFactorConfirmedAt: Any? = null,

    @field:SerializedName("email_verified_at")
    val emailVerifiedAt: Any? = null,

    @field:SerializedName("current_team_id")
    val currentTeamId: Any? = null,

    @field:SerializedName("profile_photo_path")
    val profilePhotoPath: String? = null,

    @field:SerializedName("created_at")
    val createdAt: String,

    @field:SerializedName("updated_at")
    val updatedAt: String,

    @field:SerializedName("profile_photo_url")
    val profilePhotoUrl: String? = null,

)
