import { connect, ConnectedProps } from 'react-redux'
import {finishPollRequest} from "../../store/polls/actions";
import {PollType} from "../../types/Poll";

const mapDispatch = {
    finish: finishPollRequest,
}

export const connector = connect(null, mapDispatch)

export type PollProps = ConnectedProps<typeof connector> & PollType
