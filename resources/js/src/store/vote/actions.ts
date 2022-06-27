import {
    CreateVoteFailedAction,
    CreateVoteRequestAction,
    CreateVoteSuccessAction,
    FetchVotePollFailedAction,
    FetchVotePollRequestAction,
    FetchVotePollSuccessAction,
    VoteActionsEnum
} from "./types";
import {PollOptionType, PollType} from "../../types/Poll";

export const fetchVotePollRequest = (id: string): FetchVotePollRequestAction => {
    return {
        type: VoteActionsEnum.FETCH_VOTE_POLL_REQUEST,
        payload: id
    }
}

export const fetchVotePollSuccess = (poll: PollType): FetchVotePollSuccessAction => {
    return {
        type: VoteActionsEnum.FETCH_VOTE_POLL_SUCCESS,
        payload: poll
    }
}

export const fetchVotePollFailed = (error: string): FetchVotePollFailedAction => {
    return {
        type: VoteActionsEnum.FETCH_VOTE_POLL_FAILED,
        payload: error
    }
}

export const createVoteRequest = (option: PollOptionType): CreateVoteRequestAction => {
    return {
        type: VoteActionsEnum.CREATE_VOTE_REQUEST,
        payload: option
    }
}

export const createVoteSuccess = (message: string): CreateVoteSuccessAction => {
    return {
        type: VoteActionsEnum.CREATE_VOTE_SUCCESS,
        payload: message
    }
}

export const createVoteFailed = (error: string): CreateVoteFailedAction => {
    return {
        type: VoteActionsEnum.CREATE_VOTE_FAILED,
        payload: error
    }
}
