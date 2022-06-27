import {
    CreatePollFailedAction,
    CreatePollRequestAction, CreatePollSuccessAction,
    FetchPollsFailedAction,
    FetchPollsRequestAction,
    FetchPollsSuccessAction, FinishPollFailedAction, FinishPollRequestAction, FinishPollSuccessAction,
    PollsActionsEnum,
    ResetPollFlagsAction
} from "./types";
import {PollType} from "../../types/Poll";

export const fetchPollsRequest = (): FetchPollsRequestAction => {
    return {
        type: PollsActionsEnum.FETCH_POLLS_REQUEST
    }
}

export const fetchPollsSuccess = (polls: PollType[]): FetchPollsSuccessAction => {
    return {
        type: PollsActionsEnum.FETCH_POLLS_SUCCESS,
        payload: polls
    }
}

export const fetchPollsFailed = (error: string): FetchPollsFailedAction => {
    return {
        type: PollsActionsEnum.FETCH_POLLS_FAILED,
        payload: error
    }
}

export const finishPollRequest = (pollId: string): FinishPollRequestAction => {
    return {
        type: PollsActionsEnum.FINISH_POLL_REQUEST,
        payload: pollId
    }
}

export const finishPollSuccess = (pollId: string): FinishPollSuccessAction => {
    return {
        type: PollsActionsEnum.FINISH_POLL_SUCCESS,
        payload: pollId
    }
}

export const finishPollFailed = (error: string): FinishPollFailedAction => {
    return {
        type: PollsActionsEnum.FINISH_POLL_FAILED,
        payload: error
    }
}

export const createPollRequest = (poll: PollType): CreatePollRequestAction => {
    return {
        type: PollsActionsEnum.CREATE_POLL_REQUEST,
        payload: poll
    }
}

export const createPollSuccess = (): CreatePollSuccessAction => {
    return {
        type: PollsActionsEnum.CREATE_POLL_SUCCESS
    }
}

export const createPollFailed = (error: string): CreatePollFailedAction => {
    return {
        type: PollsActionsEnum.CREATE_POLL_FAILED,
        payload: error
    }
}

export const resetPollFlags = (): ResetPollFlagsAction => {
    return {
        type: PollsActionsEnum.RESET_POLL_FLAGS
    }
}

