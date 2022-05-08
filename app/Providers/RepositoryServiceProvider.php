<?php

namespace App\Providers;

use App\Adapters\Repositories\PollOptionRepository;
use App\Adapters\Repositories\PollRepository;
use App\Adapters\Repositories\UserRepository;
use App\Adapters\Repositories\VoteRepository;
use App\Domain\Contracts\Repositories\PollOptionRepositoryInterface;
use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\Repositories\VoteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        UserRepositoryInterface::class => [
            UserRepository::class,
        ],
        PollRepositoryInterface::class => [
            PollRepository::class,
        ],
        PollOptionRepositoryInterface::class => [
            PollOptionRepository::class,
        ],
        VoteRepositoryInterface::class => [
            VoteRepository::class,
        ],
    ];
}
