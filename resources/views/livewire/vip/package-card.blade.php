<?php

use App\Models\Utility\VipPackage;
use Livewire\Volt\Component;
use Livewire\Attributes\Computed;

new class extends Component {
    public VipPackage $package;
    public bool $isFeatured = false;

    #[Computed]
    public function label(): string
    {
        return $this->package->level->getLabel();
    }
}; ?>

<div @class([
    'p-2 flex flex-col gap-2 rounded-2xl border border-zinc-200 dark:border-zinc-700/75 bg-zinc-100 dark:bg-zinc-900',
    'sm:col-span-2' => $this->isFeatured,
])>
    <div class="flex flex-col space-y-8 h-full rounded-lg shadow-sm p-6 md:p-8 bg-white dark:bg-zinc-800">
        <x-vip.package-card-header
            :tokens="$this->package->cost"
            :duration="$this->package->duration"
            :tier="$this->label"
            :is-best-value="$this->package->is_best_value"
        />

        <div @class([
            'grid gap-3',
            'sm:grid-cols-2' => $this->isFeatured,
        ])>
            <x-vip.benefits-list/>
        </div>

        <div>
            <flux:modal.trigger name="upgrade-to-{{ strtolower($this->label) }}">
                <flux:button
                    :variant="$this->isFeatured ? 'primary' : 'filled'"
                    icon-trailing="chevron-right"
                    class="w-full"
                >
                    Upgrade to {{ $this->label }}
                </flux:button>
            </flux:modal.trigger>

            <flux:modal name="upgrade-to-{{ strtolower($this->label) }}"
                        class="min-w-[26rem] space-y-6">
                <div>
                    <flux:heading size="lg">Upgrade to {{ $this->label }}?</flux:heading>

                    <flux:subheading>
                        You're about to upgrade your account to {{ $this->label }}.
                    </flux:subheading>
                </div>

                <div>
                    <flux:text class="flex gap-1">
                        Cost:
                        <flux:heading>{{ $this->package->cost }} tokens</flux:heading>
                    </flux:text>
                    <flux:text class="flex gap-1">
                        Duration:
                        <flux:heading>{{ $this->package->duration }} days</flux:heading>
                    </flux:text>
                </div>

                <div class="flex gap-2">
                    <flux:spacer/>

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="button" variant="primary"
                                 wire:click="$parent.purchase({{ $this->package->id }})">
                        Confirm
                    </flux:button>
                </div>
            </flux:modal>
        </div>
    </div>
</div>
