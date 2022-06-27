import { connect, ConnectedProps } from 'react-redux'
import { AppState } from "../../store";
import {fetchPollsRequest, finishPollRequest} from "../../store/polls/actions";

const mapState = (state: AppState) => ({
    polls: state.polls.all || [],
    fetching: state.polls.fetching,
    finishing: state.polls.finishing,
    error: state.polls.error
})

const mapDispatch = {
    fetchPolls: fetchPollsRequest,
    finishPoll: finishPollRequest
}

export const connector = connect(mapState, mapDispatch)

export type PollsProps = ConnectedProps<typeof connector>
