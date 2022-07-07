<script setup>
import Panel from '../../../Components/Panel.vue';
import WorkExperience from '../../../Components/WorkExperience.vue';
import RoundedButton from '../../../Components/RoundedButton.vue';
</script>

<template>
    <Panel class="p-6 row-span-2 col-span-2" panel-title="Work Experience"
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
            <rounded-button bg-color="indigo" text-color="grey" tooltip="Add Work Experience">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </rounded-button>
        </template>
        <template #body>
            <WorkExperience company="Apple Inc" job-title="Senior Product Tester" date-from="May 2003"
                date-to="June 2004"
                summary="Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa">
            </WorkExperience>
            <WorkExperience company="Apple Inc" job-title="Senior Product Tester" date-from="May 2003"
                date-to="June 2004"
                summary="Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa">
            </WorkExperience>
            <WorkExperience company="Amazon Inc" job-title="Senior Box Shipper" date-from="May 2003" date-to="June 2004"
                summary="Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa">
            </WorkExperience>
            <WorkExperience company="Orange Inc" job-title="Senior Product Taster" date-from="May 2003"
                date-to="June 2004"
                summary="Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa">
            </WorkExperience>
        </template>
    </Panel>
</template>
