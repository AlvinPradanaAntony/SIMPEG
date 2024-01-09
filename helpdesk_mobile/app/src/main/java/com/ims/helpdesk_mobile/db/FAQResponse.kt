package com.ims.helpdesk_mobile.db

import android.os.Parcelable
import kotlinx.parcelize.Parcelize

@Parcelize
data class FAQResponse(
    val question: String,
    val answer: String? = null
) : Parcelable
