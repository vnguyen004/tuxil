<script setup>
import Panel from '../../../Components/Panel.vue';
import Reference from '../../../Components/Reference.vue';
import RoundedButton from '../../../Components/RoundedButton.vue';
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
            <ul role="list" class="divide-y divide-gray-200 bg-white rounded shadow border">
                <reference
                    full-name="James Henry"
                    email-address="james@henry.com"
                    phone-number="293.443.2334"
                ></reference>
                <reference
                    full-name="James Henry"
                    email-address="james@henry.com"
                    phone-number="293.443.2334"
                ></reference>
                <reference
                    full-name="James Henry"
                    email-address="james@henry.com"
                    phone-number="293.443.2334"
                ></reference>
                <reference
                    full-name="James Henry"
                    email-address="james@henry.com"
                    phone-number="293.443.2334"
                ></reference>
            </ul>
        </template>
    </Panel>
</template>
