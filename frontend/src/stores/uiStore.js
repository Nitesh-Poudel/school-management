import { defineStore } from 'pinia'
export const useUiStore = defineStore('ui', {
  state: () => ({
    isSidebarVisible: false,
  }),
  actions: {
    showSidebar() {
      this.isSidebarVisible = true
    },
    hideSidebar() {
      this.isSidebarVisible = false
    },
    toggleSidebar() {
      this.isSidebarVisible = !this.isSidebarVisible
    },
  },
})