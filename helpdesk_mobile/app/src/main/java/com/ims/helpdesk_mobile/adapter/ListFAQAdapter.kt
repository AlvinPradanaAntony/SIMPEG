package com.ims.helpdesk_mobile.adapter

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.ims.helpdesk_mobile.databinding.ItemsRowFaqBinding
import com.ims.helpdesk_mobile.db.FAQResponse

class ListFAQAdapter(private val listData: ArrayList<FAQResponse>): RecyclerView.Adapter<ListFAQAdapter.ListViewHolders>()  {
    private lateinit var onItemClickCallback: OnItemClickCallback
    fun setOnItemClickCallback(onItemClickCallback: OnItemClickCallback) {
        this.onItemClickCallback = onItemClickCallback
    }
    class ListViewHolders(var binding: ItemsRowFaqBinding) : RecyclerView.ViewHolder(binding.root)

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ListViewHolders {
        val binding = ItemsRowFaqBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return ListViewHolders(binding)
    }

    override fun getItemCount(): Int = listData.size

    override fun onBindViewHolder(holder: ListViewHolders, position: Int) {
        val (question) = listData[position]
        holder.binding.tvItemQuestion.text = question
//        holder.itemView.setOnClickListener { onItemClickCallback.onItemClicked(listData[holder.adapterPosition]) }
    }

    interface OnItemClickCallback {
        fun onItemClicked(data: FAQResponse)
    }
}