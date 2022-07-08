<script setup>
import Panel from '../../../Components/Panel.vue';
import WorkExperience from '../../../Components/WorkExperience.vue';
import RoundedButton from '../../../Components/RoundedButton.vue';
import JetDialogModal from '../../../Jetstream/DialogModal.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '../../../Jetstream/InputError.vue';
import JetButton from '@/Jetstream/DangerButton.vue';
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';
import '@vuepic/vue-datepicker/dist/main.css'
import DatePicker from '@vuepic/vue-datepicker'
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref, computed } from 'vue';
const confirmRemove = ref(false);
const showModal = ref(false);

const showForm = useForm('showform', {
    company_name: '',
    job_title: '',
    date_from: '',
    date_to: '',
    summary: '',
    is_current: false
})

// remove remove form
const removeForm = useForm({
    experience: null
})

// confirm removal
const onRemoveClick = (experience) => {
    confirmRemove.value = true
    removeForm.experience = experience
}

// trigger removal
const removeExperience = () => {
    removeForm.delete(route('user.experience.destroy', {
        'experience': removeForm.experience.id
    }), {
        preserveScroll: true,
        onSuccess: () => closeRemoveModal(),
        onError: () => {},
        onFinish: () => removeForm.reset()
    })
}

// close remove modal
const closeRemoveModal = () => {
    confirmRemove.value = false
    removeForm.reset()
}

// edit/create click handler
const onShowClick = (skill) => {
    if (skill !== undefined) {
        showForm.name = skill.name
        showForm.desc = skill.desc
        showForm.since = skill.since
        showForm.isEdit = true
    }

    showModal.value = true
}

const showAction = () => {
    /// edit/create are two different endpoints
    if (showForm.isEdit === true) {

    } else {
        showForm.post(route('user.skill.store'), {
            preserveScroll: true,
            onSuccess: () => closeShowModal(),
            onError: () => {},
            onFinish:() => showForm.reset()
        })
    }
}

const closeShowModal = () => {
    showModal.value = false
    showForm.reset()
}
</script>

<template>
    <Panel class="p-6 row-span-3 col-span-2" panel-title="Work Experience"
        panel-decription="Enter your work experience. Don't worry about the order, we'll sort it all out in the end. Add as many as you need.">
        <template #icon>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-person-workspace" viewBox="0 0 16 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                <path
                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
            </svg>
        </template>
        <template #action>
            <rounded-button
                bg-color="indigo"
                text-color="grey"
                tooltip="Add Work Experience"
                @click="onShowClick()"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </rounded-button>
        </template>
        <template #body>
            <div v-if="$page.props.workExperiences.length > 0" class="space-y-4">
                <template v-for="workExperience in $page.props.workExperiences">
                    <WorkExperience
                        :experience="workExperience"
                        @remove="onRemoveClick"
                    ></WorkExperience>
                </template>
            </div>
        </template>
    </Panel>

<JetDialogModal :show="confirmRemove" @close="closeRemoveModal">
    <template #title>
        Remove Experience?
    </template>

    <template #content>
        Are you sure you want to delete this experience?
        <JetInputError :message="removeForm.errors.experience" class="mt-2" />
    </template>

    <template #footer>
        <JetSecondaryButton @click="closeRemoveModal">
            Cancel
        </JetSecondaryButton>

        <JetButton
            class="ml-3"
            :class="{ 'opacity-25': removeForm.processing }"
            :disabled="removeForm.processing"
            @click.prevent="removeExperience"
        >
            Remove
        </JetButton>
    </template>
</JetDialogModal>

<JetDialogModal :show="showModal" @close="closeShowModal">
    <template #title>
        {{ showForm.isEdit ? 'Editing Experience Information' : 'New Experience Information' }}
    </template>

    <template #content>
        <div class="mt-4">
            <label for="companyName">Who did you work for?</label>
            <JetInput
                ref="companyName"
                id="companyName"
                v-model="showForm.company_name"
                type="text"
                class="mt-1 block w-3/4"
                placeholder="Company Name"
            />

            <JetInputError :message="showForm.errors.company_name" class="mt-2" />
        </div>
        <div class="mt-4">
            When did you start working here?
            <DatePicker v-model="showForm.date_from" autoApply :max-date="new Date()" />

            <JetInputError :message="showForm.errors.date_from" class="mt-2" />
        </div>
        <div class="mt-4">
            Are you still working here?
            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-3/4" v-model="showForm.is_current">
                <option :value="false">I no longer work here</option>
                <option :value="true">I still work here</option>
            </select>

            <JetInputError :message="showForm.errors.is_current" class="mt-2" />
        </div>
        <div class="mt-4" v-if="showForm.is_current === false">
            When did you stop working here?
            <DatePicker v-model="showForm.date_to" autoApply :max-date="new Date()" />

            <JetInputError :message="showForm.errors.date_from" class="mt-2" />
        </div>
        <div class="mt-4">
            What did working here teach you?

            <textarea v-model="showForm.summary" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block h-32"></textarea>

            <JetInputError :message="showForm.errors.summary" class="mt-2" />
        </div>

    </template>

    <template #footer>
        <JetSecondaryButton @click="closeShowModal">
            Cancel
        </JetSecondaryButton>

        <JetButton
            class="ml-3 bg-blue-500 hover:bg-blue-500 focus:boder-blue-700 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600"
            :class="{ 'opacity-25': showForm.processing }"
            :disabled="showForm.processing"
            @click.prevent="showAction"
        >
            Save Skill
        </JetButton>
    </template>
</JetDialogModal>
</template>
