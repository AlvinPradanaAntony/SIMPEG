package com.ims.helpdesk_mobile.adapter

import android.annotation.SuppressLint
import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.ims.helpdesk_mobile.databinding.ItemsRowFaqBinding
import com.ims.helpdesk_mobile.db.FAQResponse
import com.ims.helpdesk_mobile.db.data.ListFaqItem

class FaqAdapter(private val listData: ArrayList<ListFaqItem>): RecyclerView.Adapter<FaqAdapter.ListViewHolders>()  {
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
        val (question, answer) = listData[position]
        holder.binding.tvItemQuestion.text = question
        holder.binding.tvItemAnswer.text = answer
        holder.binding.expand.setOnClickListener {
            if (holder.binding.tvItemAnswer.visibility == ViewGroup.GONE) {
                holder.binding.tvItemAnswer.visibility = ViewGroup.VISIBLE
            } else {
                holder.binding.tvItemAnswer.visibility = ViewGroup.GONE
            }
        }
    }

    @SuppressLint("NotifyDataSetChanged")
    fun setListFaq(faq: ArrayList<ListFaqItem>) {
        listData.clear()
        listData.addAll(faq)
        notifyDataSetChanged()
    }

    interface OnItemClickCallback {
        fun onItemClicked(data: FAQResponse)
    }
}