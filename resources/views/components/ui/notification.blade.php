@persist('notification')
<div class="toast toast-start z-50"
     x-data="{notifications: [],addNotification(notification){ this.notifications.push(notification); },removeNotification(notification){ this.notifications = this.notifications.filter(n => n.id !== notification.id) } }"
     x-on:notify.window="addNotification($event.detail);setTimeout(() => removeNotification($event.detail),5000)">
    <template x-for="notification in notifications" :key="notification.id">
        <div class="alert border cursor-pointer" @click="removeNotification(notification)"
             :class="{
                'border-green-500 bg-green-500/25 text-green-500': notification.type === 'success',
                'border-red-500 bg-red-500/25 text-red-500': notification.type === 'danger',
                'border-amber-500 bg-amber-500/25 text-amber-500': notification.type === 'warning',
                'border-sky-500 bg-sky-500/25 text-sky-500': notification.type === 'info'
             }"
        >
            <div x-show="notification.type === 'success'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                </svg>
            </div>

            <div x-show="notification.type === 'danger'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>

            <div x-show="notification.type === 'warning'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
            </div>

            <div x-show="notification.type === 'info'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
            </div>

            <span x-text="notification.title"></span>
        </div>
    </template>
</div>
@endpersist
