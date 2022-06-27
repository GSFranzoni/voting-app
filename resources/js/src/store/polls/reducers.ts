import { PollsActionsEnum, PollsActionsType, PollsInitialState, PollsState } from "./types";

const PollsReducer = (state: PollsState = PollsInitialState, action: PollsActionsType) => {
    switch (action.type) {
        case PollsActionsEnum.FETCH_POLLS_REQUEST:
            return { ...state, error: null, fetching: true }
        case PollsActionsEnum.FETCH_POLLS_SUCCESS:
            return { ...state, fetching: false, all: action.payload }
        case PollsActionsEnum.FETCH_POLLS_FAILED:
            return { ...state, fetching: false, error: action.payload }
        case PollsActionsEnum.FINISH_POLL_REQUEST:
            return { ...state, error: null, all: state.all.map(poll => {
                if (poll.id === action.payload) {
                    poll.finishing = true
                }
                return poll
            })}
        case PollsActionsEnum.FINISH_POLL_SUCCESS:
            return { ...state, all: state.all.map(poll => {
                if (poll.id === action.payload) {
                    poll.finishing = false
                    poll.finished = true
                }
                return poll
            })}
        case PollsActionsEnum.FINISH_POLL_FAILED:
            return { ...state, all: state.all.map(poll => ({ ...poll, finishing: false })), error: action.payload }
        case PollsActionsEnum.CREATE_POLL_REQUEST:
            return { ...state, error: null, created: false, creating: true }
        case PollsActionsEnum.CREATE_POLL_SUCCESS:
            return { ...state, creating: false, created: true }
        case PollsActionsEnum.CREATE_POLL_FAILED:
            return { ...state, creating: false, error: action.payload }
        case PollsActionsEnum.RESET_POLL_FLAGS:
            return { ...state, creating: false, error: '', created: false }
        default:
            return state;
    }
}

export default PollsReducer
