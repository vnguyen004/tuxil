<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import WorkExperiencePanel from './Partials/WorkExperiencePanel.vue';
import SkillsPanel from './Partials/SkillsPanel.vue';
import ReferencesPanel from './Partials/ReferencesPanel.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Tuxil Resume Builder
                        </div>

                        <div class="mt-6 text-gray-500">
                            Enter your experience, skills, and references. Hit download. It's that easy!
                        </div>
                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 grid-rows-3 md:grid-cols-3">
                        <WorkExperiencePanel />
                        <SkillsPanel />
                        <ReferencesPanel />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
