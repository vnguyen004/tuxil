<script setup>
import Panel from '../../../Components/Panel.vue';
import Skill from '../../../Components/Skill.vue';
import RoundedButton from '../../../Components/RoundedButton.vue';
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
        <rounded-button bg-color="indigo" text-color="grey" tooltip="Add Skill">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
        </rounded-button>
    </template>
    <template #body>
        <Skill
            name="PHP"
            since="7 Years"
            desc="Fooling around"
        ></Skill>

        <Skill
            name="Symfony"
            since="9 Years"
            desc="Fooling around"
        ></Skill>
        <Skill
            name="Symfony"
            since="9 Years"
            desc="Fooling around"
        ></Skill>
        <Skill
            name="Symfony"
            since="9 Years"
            desc="Fooling around"
        ></Skill>
        <Skill
            name="Symfony"
            since="9 Years"
            desc="Fooling around"
        ></Skill>
        <Skill
            name="Symfony"
            since="9 Years"
            desc="Fooling around"
        ></Skill>
    </template>
</Panel>
</template>
