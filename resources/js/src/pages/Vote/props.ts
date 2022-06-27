import { connect, ConnectedProps } from 'react-redux'
import { AppState } from "../../store";
import { createVoteRequest, fetchVotePollRequest } from "../../store/vote/actions";

const mapState = (state: AppState) => ({
    poll: state.vote.poll,
    voting: state.vote.voting,
    fetching: state.vote.fetching,
    voted: state.vote.voted,
    error: state.vote.error,
    message: state.vote.message
})

const mapDispatch = {
    fetchVotePoll: fetchVotePollRequest,
    createVote: createVoteRequest
}

export const connector = connect(mapState, mapDispatch)

export type VotePageProps = ConnectedProps<typeof connector>
