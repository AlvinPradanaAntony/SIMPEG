package com.ims.helpdesk_mobile.db.data

import com.google.gson.annotations.SerializedName

data class UserAPIResponse(

	@field:SerializedName("error")
	val error: Boolean,

	@field:SerializedName("message")
	val message: String,

	@field:SerializedName("user")
	val user: User?
)


data class User(

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

	@field:SerializedName("departments")
	val departments: Department?,

	@field:SerializedName("positions")
	val positions: Position?
)

data class Department(

	@field:SerializedName("id")
	val id: Int,

	@field:SerializedName("department")
	val department: String
)

data class Position(

	@field:SerializedName("id")
	val id: Int,

	@field:SerializedName("position")
	val position: String
)
