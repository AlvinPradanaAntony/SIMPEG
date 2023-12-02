import "./bootstrap";
import "../../public/css/style.css";
import "bootstrap/dist/css/bootstrap.css";
import "../../public/vendor/datatables/DataTables-1.13.8/css/dataTables.bootstrap5.min.css";
import "../../public/vendor/datatables/Buttons-2.4.2/css/buttons.bootstrap5.min.css";
// import '../css/app.css';

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import Unicon from "vue-unicons";
import {
    uniUsersAlt,
    uniPadlock,
    uniEye,
    uniEyeSlash,
    uniTicket,
    uniEnvelopeAdd,
    uniInfoCircle,
    uniClock,
    uniApps,
    uniQuestionCircle,
    uniBellSchool,
    uniSignOutAlt,
    uniUser,
    uniBringFront,
    uniNotebooks,
    uniTimes,
    uniEnvelopeAlt,
    uniKeySkeletonAlt,
    uniCreateDashboard,
    uniAngleRight,
    uniBars,
    uniSearch
} from "vue-unicons/dist/icons";
import bootstrap from "bootstrap/dist/js/bootstrap.bundle";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";
Unicon.add([
    uniUsersAlt,
    uniPadlock,
    uniEye,
    uniEyeSlash,
    uniTicket,
    uniEnvelopeAdd,
    uniInfoCircle,
    uniClock,
    uniApps,
    uniQuestionCircle,
    uniBellSchool,
    uniSignOutAlt,
    uniUser,
    uniBringFront,
    uniNotebooks,
    uniTimes,
    uniEnvelopeAlt,
    uniKeySkeletonAlt,
    uniCreateDashboard,
    uniAngleRight,
    uniBars,
    uniSearch
]);

createInertiaApp({
    title: (title) => {
        const isAdminRoute = window.location.pathname.startsWith("/admin");
        return isAdminRoute
            ? `${title} - Helpdesk Admin`
            : `${title} - Helpdesk`;
    },
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Unicon)
            .use(bootstrap)
            .mount(el);
    },
    progress: {
        color: "#117E71",
    },
});
