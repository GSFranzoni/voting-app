import {
    Box,
    Heading,
    Container,
    Text,
    Stack,
} from '@chakra-ui/react';

const HomePage = () => {
    return <Container maxW={'3xl'}>
        <Stack
            as={Box}
            textAlign={'center'}
            spacing={{ base: 8, md: 14 }}
            py={{ base: 20, md: 36 }}>
            <Heading
                fontWeight={600}
                fontSize={{ base: '2xl', sm: '4xl', md: '6xl' }}
                lineHeight={'110%'}>
                Take your poll <br />
                <Text as={'span'} color={'green.400'}>
                    right here
                </Text>
            </Heading>
            <Text color={'gray.500'}>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type
                specimen book.
            </Text>
        </Stack>
    </Container>
}

export default HomePage
