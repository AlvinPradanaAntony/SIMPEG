package com.ims.helpdesk_mobile.ui.webview

import android.annotation.SuppressLint
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.webkit.WebChromeClient
import android.webkit.WebView
import android.webkit.WebViewClient
import android.widget.Toast
import com.ims.helpdesk_mobile.databinding.ActivitySimpegDashboardBinding

class SimpegDashboardActivity : AppCompatActivity() {
    private lateinit var binding: ActivitySimpegDashboardBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySimpegDashboardBinding.inflate(layoutInflater)
        setContentView(binding.root)
        webViewSetup()
    }
    @SuppressLint("SetJavaScriptEnabled")
    private fun webViewSetup() {
        val webView = binding.webView
        webView.settings.javaScriptEnabled = true
        webView.settings.domStorageEnabled = true
        webView.webViewClient = object : WebViewClient() {
            override fun onPageFinished(view: WebView, url: String) {
                view.loadUrl("javascript:alert('Web SIMPEG Dashboard berhasil dimuat')")
            }
        }
        webView.webChromeClient = object : WebChromeClient() {
            override fun onJsAlert(view: WebView, url: String, message: String, result: android.webkit.JsResult): Boolean {
                Toast.makeText(this@SimpegDashboardActivity, message, android.widget.Toast.LENGTH_LONG).show()
                result.confirm()
                return true
            }
        }
        webView.loadUrl("https://simpeg.bkdpapuabarat.cloud/cms/dashboard")
    }
}