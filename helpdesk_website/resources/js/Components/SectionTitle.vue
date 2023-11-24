<style scoped>
h3 {
    font-size: var(--h3-font-size);
    font-family: NunitoSansExtraBold;
}
</style>

<template>
    <div class="card pt-2">
        <div class="card-body">
            <h3>
                <slot name="title" />
            </h3>

            <p class="small">
                <slot name="description" />
            </p>
        </div>

        <div class="px-4 sm:px-0">
            <slot name="aside" />
        </div>
    </div>
</template>
