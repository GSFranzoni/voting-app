import {VoteActionsEnum, VoteActionsType, VoteInitialState, VoteState} from "./types";

const VoteReducer = (state: VoteState = VoteInitialState, action: VoteActionsType) => {
    switch (action.type) {
        case VoteActionsEnum.FETCH_VOTE_POLL_REQUEST:
            return { ...state, error: null, fetching: true }
        case VoteActionsEnum.FETCH_VOTE_POLL_SUCCESS:
            return { ...state, fetching: false, poll: action.payload }
        case VoteActionsEnum.FETCH_VOTE_POLL_FAILED:
            return { ...state, fetching: false, error: action.payload }
        case VoteActionsEnum.CREATE_VOTE_REQUEST:
            return { ...state, error: null, voted: false, voting: true }
        case VoteActionsEnum.CREATE_VOTE_SUCCESS:
            return { ...state, voting: false, voted: true, message: action.payload }
        case VoteActionsEnum.CREATE_VOTE_FAILED:
            return { ...state, error: action.payload, voting: false }
        default:
            return state;
    }
}

export default VoteReducer
