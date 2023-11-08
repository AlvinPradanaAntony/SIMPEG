<template>
  <div>
    <ul>
      <li v-for="tab in tabs" :key="tab.id" @click="changeTab(tab.id)" :class="{ active: activeTab === tab.id }">{{ tab.title }}</li>
    </ul>
    <TabContent :tab="activeTab" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      tabs: [
        { id: 1, title: 'Tab 1' },
        { id: 2, title: 'Tab 2' },
        { id: 3, title: 'Tab 3' },
      ],
      activeTab: 1,
    };
  },
  components: {
    TabContent,
  },
  methods: {
    changeTab(tabId) {
      this.activeTab = tabId;
    },
  },
};
</script>
