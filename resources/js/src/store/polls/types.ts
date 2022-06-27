import {PollType} from "../../types/Poll";

export enum PollsActionsEnum {
    FETCH_POLLS_REQUEST = "@app:FETCH_POLLS_REQUEST",
    FETCH_POLLS_SUCCESS = "@app:FETCH_POLLS_SUCCESS",
    FETCH_POLLS_FAILED = "@app:FETCH_POLLS_FAILED",
    FINISH_POLL_REQUEST = "@app:FINISH_POLL_REQUEST",
    FINISH_POLL_SUCCESS = "@app:FINISH_POLL_SUCCESS",
    FINISH_POLL_FAILED = "@app:FINISH_POLL_FAILED",
    CREATE_POLL_REQUEST = "@app:CREATE_POLL_REQUEST",
    CREATE_POLL_SUCCESS = "@app:CREATE_POLL_SUCCESS",
    CREATE_POLL_FAILED = "@app:CREATE_POLL_FAILED",
    RESET_POLL_FLAGS = "@app:RESET_POLL_FLAGS"
}

export type FetchPollsRequestAction = {
    type: PollsActionsEnum.FETCH_POLLS_REQUEST
}

export type FetchPollsSuccessAction = {
    type: PollsActionsEnum.FETCH_POLLS_SUCCESS,
    payload: PollType[]
}

export type FetchPollsFailedAction = {
    type: PollsActionsEnum.FETCH_POLLS_FAILED,
    payload: string
}

export type FinishPollRequestAction = {
    type: PollsActionsEnum.FINISH_POLL_REQUEST,
    payload: string
}

export type FinishPollSuccessAction = {
    type: PollsActionsEnum.FINISH_POLL_SUCCESS,
    payload: string
}

export type FinishPollFailedAction = {
    type: PollsActionsEnum.FINISH_POLL_FAILED,
    payload: string
}

export type CreatePollRequestAction = {
    type: PollsActionsEnum.CREATE_POLL_REQUEST,
    payload: PollType
}

export type CreatePollSuccessAction = {
    type: PollsActionsEnum.CREATE_POLL_SUCCESS
}

export type CreatePollFailedAction = {
    type: PollsActionsEnum.CREATE_POLL_FAILED,
    payload: string
}

export type ResetPollFlagsAction = {
    type: PollsActionsEnum.RESET_POLL_FLAGS
}

export type PollsActionsType = FetchPollsRequestAction
    | FetchPollsSuccessAction
    | FetchPollsFailedAction
    | FinishPollRequestAction
    | FinishPollSuccessAction
    | FinishPollFailedAction
    | CreatePollRequestAction
    | CreatePollSuccessAction
    | CreatePollFailedAction
    | ResetPollFlagsAction

export type PollsState = {
    all: PollType[],
    fetching?: boolean,
    finishing?: boolean,
    creating?: boolean,
    created?: boolean,
    error?: string
}

export const PollsInitialState: PollsState = {
    all: [],
    fetching: false,
    creating: false,
    finishing: false,
    created: false,
    error: ''
}
