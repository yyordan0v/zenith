<?php

use App\Enums\Game\AccountLevel;
use App\Filament\Resources\CharacterResource;
use App\Filament\Resources\MemberResource;
use App\Filament\Resources\MemberResource\Pages\EditMember;
use App\Models\User\Member;
use App\Models\User\User;
use Illuminate\Support\Carbon;

use function Pest\Livewire\livewire;

beforeEach(function () {
    refreshTable('MEMB_INFO', 'gamedb_main');

    $this->user = User::factory()->create();
});

describe('Render', function () {
    it('can render index page', function () {
        $this->get(MemberResource::getUrl('index'))
            ->assertSuccessful();
    });

    it('can render edit page', function () {
        $this->get(MemberResource::getUrl('edit', [$this->user->name]))
            ->assertSuccessful();
    });
});

describe('Create & Delete restrictions', function () {
    it('returns false on canCreate', function () {
        $result = CharacterResource::canCreate();

        $this->assertFalse($result);
    });

    it('returns false on canDelete', function () {
        $result = MemberResource::canDelete($this->user->member);

        $this->assertFalse($result);
    });
});

describe('Edit account level and expiration date', function () {
    it('validates', function () {
        $member = $this->user->member;

        livewire(MemberResource\Pages\EditMember::class, [
            'record' => $member->getKey(),
        ])
            ->fillForm([
                'AccountLevel' => 'invalid_level',
                'AccountExpireDate' => 'not-a-date',
            ])
            ->call('save');

        $member->refresh();
        expect($member->AccountLevel)->not->toBe('invalid_level')
            ->and($member->AccountExpireDate)->not->toBe('not-a-date');
    });

    it('accepts valid data without errors and saves it to the database', function () {
        $member = $this->user->member;
        $expirationDate = now()->addYear()->startOfMinute();

        livewire(EditMember::class, ['record' => $member->getRouteKey()])
            ->fillForm([
                'AccountLevel' => AccountLevel::Bronze,
                'AccountExpireDate' => $expirationDate,
            ])
            ->call('save')
            ->assertHasNoErrors(['AccountLevel', 'AccountExpireDate']);

        $member->refresh();

        expect($member->AccountLevel)->toBe(AccountLevel::Bronze);

        $storedDate = $member->AccountExpireDate;
        if (is_string($storedDate)) {
            $storedDate = Carbon::parse($storedDate);
        }

        expect($storedDate->startOfMinute()->toDateTimeString())
            ->toBe($expirationDate->toDateTimeString());
    });
});

describe('Edit tokens', function () {
    it('validates', function () {
        $member = $this->user->member;

        livewire(MemberResource\Pages\EditMember::class, [
            'record' => $member->getKey(),
        ])
            ->fillForm([
                'tokens' => -10,
            ])
            ->call('save');

        $member->refresh();
        expect($member->tokens)->not->toBe(-10);
    });

    it('accepts valid data without errors and saves it', function () {
        $member = $this->user->member;

        livewire(EditMember::class, ['record' => $member->getRouteKey()])
            ->fillForm([
                'tokens' => 5000,
            ])
            ->call('save')
            ->assertHasNoErrors(['tokens']);

        $member->refresh();

        expect($member->tokens)->toBe(5000);
    });
});

describe('Global Search', function () {
    it('returns the correct globally searchable attributes', function () {
        $expectedAttributes = ['memb___id', 'mail_addr'];

        expect(MemberResource::getGloballySearchableAttributes())
            ->toBe($expectedAttributes);
    });

    it('returns the correct global search result title', function () {
        $username = fakeUsername();
        $email = fakeEmail();

        $member = new Member([
            'memb___id' => $username,
            'mail_addr' => $email,
        ]);

        $expectedTitle = $username.' ('.$email.')';

        expect(MemberResource::getGlobalSearchResultTitle($member))
            ->toBe($expectedTitle);
    });
});
