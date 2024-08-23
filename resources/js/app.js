import "./bootstrap";

import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import Animate from "alpinejs-animate";
import focus from "@alpinejs/focus";

Alpine.plugin(focus);
Alpine.plugin(Animate);

Livewire.start();