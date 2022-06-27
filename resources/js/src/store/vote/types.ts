import {PollOptionType, PollType} from "../../types/Poll";

export enum VoteActionsEnum {
    FETCH_VOTE_POLL_REQUEST = "@app:FETCH_VOTE_POLL_REQUEST",
    FETCH_VOTE_POLL_SUCCESS = "@app:FETCH_VOTE_POLL_SUCCESS",
    FETCH_VOTE_POLL_FAILED = "@app:FETCH_VOTE_POLL_FAILED",
    CREATE_VOTE_REQUEST = "@app:CREATE_VOTE_REQUEST",
    CREATE_VOTE_SUCCESS = "@app:CREATE_VOTE_SUCCESS",
    CREATE_VOTE_FAILED = "@app:CREATE_VOTE_FAILED"
}

export type FetchVotePollRequestAction = {
    type: VoteActionsEnum.FETCH_VOTE_POLL_REQUEST,
    payload: string
}

export type FetchVotePollSuccessAction = {
    type: VoteActionsEnum.FETCH_VOTE_POLL_SUCCESS,
    payload: PollType
}

export type FetchVotePollFailedAction = {
    type: VoteActionsEnum.FETCH_VOTE_POLL_FAILED,
    payload: string
}

export type CreateVoteRequestAction = {
    type: VoteActionsEnum.CREATE_VOTE_REQUEST,
    payload: PollOptionType
}

export type CreateVoteSuccessAction = {
    type: VoteActionsEnum.CREATE_VOTE_SUCCESS,
    payload: string
}

export type CreateVoteFailedAction = {
    type: VoteActionsEnum.CREATE_VOTE_FAILED,
    payload: string
}

export type VoteActionsType = FetchVotePollRequestAction
    | FetchVotePollSuccessAction
    | FetchVotePollFailedAction
    | CreateVoteRequestAction
    | CreateVoteSuccessAction
    | CreateVoteFailedAction

export type VoteState = {
    readonly poll?: PollType,
    readonly fetching?: boolean,
    readonly voting?: boolean,
    readonly voted?: boolean,
    readonly error?: string,
    readonly message?: string
}

export const VoteInitialState: VoteState = {
    poll: undefined,
    fetching: false,
    voting: false,
    voted: false,
    error: '',
    message: ''
}
