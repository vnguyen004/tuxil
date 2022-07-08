<script setup>
import Panel from '../../../Components/Panel.vue';
import Skill from '../../../Components/Skill.vue';
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

const confirmSkillDeletion = ref(false);
const showSkillModal = ref(false);

const showSkillForm = useForm('showform', {
    name: '',
    skill_since: '',
    description: '',
    isEdit: false
})

// remove remove form
const skillRemoveForm = useForm({
    skill: null
})

// confirm removal
const onRemoveClick = (skill) => {
    confirmSkillDeletion.value = true
    skillRemoveForm.skill = skill
}

// trigger removal
const removeSkill = () => {
    skillRemoveForm.delete(route('user.skill.destroy', {
        'skill': skillRemoveForm.skill.id
    }), {
        preserveScroll: true,
        onSuccess: () => closeRemoveModal(),
        onError: () => {},
        onFinish: () => skillRemoveForm.reset()
    })
}

// close remove modal
const closeRemoveModal = () => {
    confirmSkillDeletion.value = false
    skillRemoveForm.reset()
}

// edit/create click handler
const onShowClick = (skill) => {
    if (skill !== undefined) {
        showSkillForm.name = skill.name
        showSkillForm.desc = skill.desc
        showSkillForm.since = skill.since
        showSkillForm.isEdit = true
    }

    showSkillModal.value = true
}

const showAction = () => {
    /// edit/create are two different endpoints
    if (showSkillForm.isEdit === true) {

    } else {
        showSkillForm.post(route('user.skill.store'), {
            preserveScroll: true,
            onSuccess: () => closeShowModal(),
            onError: () => {},
            onFinish:() => showSkillForm.reset()
        })
    }
}

const closeShowModal = () => {
    showSkillModal.value = false
    showSkillForm.reset()
}

</script>

<template>
<Panel
    class="p-6 border-t border-gray-200 md:border-t-0 md:border-l"
    panel-title="Your Skills"
    panel-decription="Describe your skills. How did you acquire them?"
>
    <template #icon>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
            class="bi bi-stars" viewBox="0 0 16 16">
            <path
                d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
        </svg>
    </template>
    <template #action>
        <rounded-button
            bg-color="indigo"
            text-color="grey"
            tooltip="Add Skill"
            @click="onShowClick()"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
        </rounded-button>
    </template>
    <template #body>
        <div v-if="$page.props.skills.length > 0" class="space-y-4">
            <template v-for="skill in $page.props.skills" :key="skill.id">
                <Skill
                    :skill="skill"
                    @remove="onRemoveClick"
                ></Skill>
            </template>
        </div>
        <div v-else>
            You don't have any skills yet!
        </div>
    </template>
</Panel>
<JetDialogModal :show="confirmSkillDeletion" @close="closeRemoveModal">
    <template #title>
        Remove Skill?
    </template>

    <template #content>
        Are you sure you want to delete this skill?
        <JetInputError :message="skillRemoveForm.errors.skill" class="mt-2" />
    </template>

    <template #footer>
        <JetSecondaryButton @click="closeRemoveModal">
            Cancel
        </JetSecondaryButton>

        <JetButton
            class="ml-3"
            :class="{ 'opacity-25': skillRemoveForm.processing }"
            :disabled="skillRemoveForm.processing"
            @click="removeSkill"
        >
            Remove
        </JetButton>
    </template>
</JetDialogModal>

<JetDialogModal :show="showSkillModal" @close="closeShowModal">
    <template #title>
        {{ showSkillForm.isEdit ? 'Editing Skill Information' : 'New Skill Information' }}
    </template>

    <template #content>
        <div class="mt-4">
            <label for="skillName">What is your skill?</label>
            <JetInput
                ref="skillName"
                id="skillName"
                v-model="showSkillForm.name"
                type="text"
                class="mt-1 block w-3/4"
                placeholder="Skill Name"
            />

            <JetInputError :message="showSkillForm.errors.name" class="mt-2" />
        </div>
        <div class="mt-4">
            How long have you had this skill?
            <DatePicker v-model="showSkillForm.skill_since" autoApply :max-date="new Date()" />

            <JetInputError :message="showSkillForm.errors.skill_since" class="mt-2" />
        </div>
        <div class="mt-4">
            How did you acquire this skill?

            <textarea v-model="showSkillForm.description" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block h-32"></textarea>

            <JetInputError :message="showSkillForm.errors.description" class="mt-2" />
        </div>

    </template>

    <template #footer>
        <JetSecondaryButton @click="closeShowModal">
            Cancel
        </JetSecondaryButton>

        <JetButton
            class="ml-3 bg-blue-500 hover:bg-blue-500 focus:boder-blue-700 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600"
            :class="{ 'opacity-25': showSkillForm.processing }"
            :disabled="showSkillForm.processing"
            @click="showAction"
        >
            Save Skill
        </JetButton>
    </template>
</JetDialogModal>

</template>
