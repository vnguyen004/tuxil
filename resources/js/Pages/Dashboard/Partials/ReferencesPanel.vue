<script setup>
import Panel from '../../../Components/Panel.vue';
import Reference from '../../../Components/Reference.vue';
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
    reference: null
})

// confirm removal
const onRemoveClick = (reference) => {
    confirmRemove.value = true
    removeForm.reference = reference
}

// trigger removal
const removereference = () => {
    removeForm.delete(route('user.reference.destroy', {
        'reference': removeForm.reference.id
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
    <Panel
        class="p-6 border-t border-gray-200 md:border-l"
        panel-title="References"
        panel-decription="Who will say nice things about you?">
        <template #icon>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-people" viewBox="0 0 16 16">
                <path
                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
            </svg>
        </template>
        <template #action>
            <rounded-button bg-color="indigo" text-color="grey" tooltip="Add Reference">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </rounded-button>
        </template>
        <template #body>
            <ul
                v-if="$page.props.references.length > 0"
                role="list"
                class="divide-y divide-gray-200 bg-white rounded shadow border">
                <template v-for="reference in $page.props.references">
                    <reference
                        :reference="reference"
                    ></reference>
                </template>
            </ul>
        </template>
    </Panel>

<JetDialogModal :show="confirmRemove" @close="closeRemoveModal">
    <template #title>
        Remove Reference?
    </template>

    <template #content>
        Are you sure you want to delete this reference?
        <JetInputError :message="removeForm.errors.reference" class="mt-2" />
    </template>

    <template #footer>
        <JetSecondaryButton @click="closeRemoveModal">
            Cancel
        </JetSecondaryButton>

        <JetButton
            class="ml-3"
            :class="{ 'opacity-25': removeForm.processing }"
            :disabled="removeForm.processing"
            @click="removereference"
        >
            Remove
        </JetButton>
    </template>
</JetDialogModal>

<JetDialogModal :show="showModal" @close="closeShowModal">
    <template #title>
        {{ showForm.isEdit ? 'Editing reference Information' : 'New reference Information' }}
    </template>

    <template #content>
        <div class="mt-4">
            <label for="fullName">Who says nice things about you?</label>
            <JetInput
                ref="fullName"
                id="fullName"
                v-model="showForm.full_name"
                type="text"
                class="mt-1 block w-3/4"
                placeholder="Reference Full Name"
            />

            <JetInputError :message="showForm.errors.full_name" class="mt-2" />
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
            @click="showAction"
        >
            Save Skill
        </JetButton>
    </template>
</JetDialogModal>
</template>
