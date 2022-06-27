
export type PollOptionType = {
    id?: string,
    description: string,
    pollId?: string
}

export type PollType = {
    id?: string,
    description: string,
    finishing: boolean,
    finished: boolean,
    finishedAt?: string,
    userId?: string,
    options: Array<PollOptionType>
}
