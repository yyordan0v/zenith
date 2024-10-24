<?php

use App\Actions\UpgradeAccountLevel;
use App\Enums\Game\AccountLevel;
use App\Models\User\User;
use App\Models\Utility\VipPackage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();

        if ($this->user->member->AccountLevel !== AccountLevel::Regular &&
            now()->lessThan($this->user->member->AccountExpireDate)
        ) {
            Redirect::route('vip');
        }
    }

    #[Computed]
    public function packages()
    {
        return VipPackage::orderBy('sort_order', 'asc')->get();
    }

    public function purchase($packageId, UpgradeAccountLevel $action): void
    {
        $package = VipPackage::findOrFail($packageId);

        if ($action->handle($this->user, $package)) {
            Flux::modal('upgrade-to-'.strtolower($package->level->getLabel()))->close();
            $this->redirect(route('vip'), navigate: true);
        }
    }
}; ?>

<div class="space-y-8">
    <header>
        <flux:heading size="xl">
            {{ __('Upgrade Your Account') }}
        </flux:heading>

        <flux:subheading>
            {{ __('Get a head start and accelerate your progress with our premium packages.') }}
        </flux:subheading>
    </header>

    <div class="grid sm:grid-cols-2 gap-4">
        @foreach ($this->packages as $index => $package)
            <livewire:vip.package-card
                :$package
                :is-featured="$loop->first"
                :wire:key="'package-' . $package->id"
            />
        @endforeach
    </div>
</div>
